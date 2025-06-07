<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report1($pid)
    {
        $payment = Payment::find($pid);
        $pdf = App::make('dompdf.wrapper');

        // Set UTF-8 encoding in HTML
        $print = "<!DOCTYPE html>";
        $print .= "<html lang='vi'>";
        $print .= "<head>";
        $print .= "<meta charset='UTF-8'>";
        $print .= "<title>Payment Receipt</title>";
        $print .= "<style>";
        $print .= "body { font-family: DejaVu Sans, sans-serif; }"; // Use a font that supports UTF-8
        $print .= "</style>";
        $print .= "</head>";
        $print .= "<body>";
        $print .= "<div style='margin:20px; padding:20px;'>";
        $print .= "<h1 align='center'>Hoá đơn thanh toán học phí</h1>";
        $print .= "<hr/>";
        $print .= "<p>Biên lai số: <b>" . $pid . "</b></p>";
        $print .= "<p>Ngày thực hiện thanh toán: <b>" . $payment->paid_date . "</b></p>";
        $print .= "<p>Mã đăng ký: <b>" . $payment->enrollment->enroll_no . "</b></p>";
        $print .= "<p>Tên sinh viên: <b>" . htmlspecialchars($payment->enrollment->student->name, ENT_QUOTES, 'UTF-8') . "</b></p>";

        $print .= "<hr/>";
        $print .= "<table style='width: 100%;'>";
        $print .= "<tr>";
        $print .= "<td>Tên khoá học</td>";
        $print .= "<td>Số tiền thanh toán</td>";
        $print .= "</tr>";
        $print .= "<tr>";
        $print .= "<td><h3>" . htmlspecialchars($payment->enrollment->batch->name, ENT_QUOTES, 'UTF-8') . "</h3></td>";
        $print .= "<td><h3>" . $payment->amount() . "</h3></td>";
        $print .= "</tr>";
        $print .= "</table>";
        $print .= "<hr/>";

        $print .= "<span>Printed By: <b>Nhóm 7</b></span><br>";
        $print .= "<span>Printed Date: <b>" . date('Y-m-d') . "</b></span>";
        $print .= "</div>";
        $print .= "</body>";
        $print .= "</html>";

        // Load HTML with UTF-8 encoding
        $pdf->loadHTML($print, 'UTF-8');

        // Optional: Set font for dompdf to handle UTF-8 characters
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isFontSubsettingEnabled' => true]);

        return $pdf->stream();
    }
}
?>