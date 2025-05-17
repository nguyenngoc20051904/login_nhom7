import React from 'react';
import { useLocation, useNavigate } from 'react-router-dom';

export default function UserInfoDisplay() {
  const { state } = useLocation();
  const navigate = useNavigate();

  if (!state) {
    return (
      <div className="text-center mt-5">
        <h4>Không có dữ liệu để hiển thị!</h4>
        <button className="btn btn-secondary mt-3" onClick={() => navigate('/')}>Quay lại</button>
      </div>
    );
  }

  return (
    <div className="h-100 d-flex align-items-center justify-content-center bg-light" style={{ minHeight: '100vh' }}>
      <div className="card p-4 shadow" style={{ width: '500px' }}>
        <h4 className="text-success mb-3 text-center">Thông tin đã nhập:</h4>
        <ul className="list-group list-group-flush">
          <li className="list-group-item"><strong>Họ và tên:</strong> {state.fullName}</li>
          <li className="list-group-item"><strong>Email:</strong> {state.email}</li>
          <li className="list-group-item"><strong>SĐT:</strong> {state.phone}</li>
          <li className="list-group-item"><strong>Ghi chú:</strong> {state.notes || 'Không có'}</li>
        </ul>
        <button className="btn btn-secondary mt-4" onClick={() => navigate('/')}>Quay lại form</button>
      </div>
    </div>
  );
}
