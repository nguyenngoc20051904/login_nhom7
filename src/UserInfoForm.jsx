import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

export default function UserInfoForm() {
  const [formData, setFormData] = useState({
    fullName: '',
    email: '',
    phone: '',
    notes: ''
  });

  const navigate = useNavigate();

  const handleChange = e => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleSubmit = e => {
    e.preventDefault();
    // Điều hướng sang trang hiển thị và truyền dữ liệu qua state
    navigate('/display', { state: formData });
  };

  return (
    <div className="h-100 d-flex align-items-center justify-content-center bg-light" style={{ minHeight: '100vh' }}>
      <div className="card p-4 shadow" style={{ width: '500px' }}>
        <h3 className="text-center text-primary mb-4">Thu thập thông tin</h3>
        <form onSubmit={handleSubmit}>
          <div className="mb-3">
            <label className="form-label">Họ và tên</label>
            <input type="text" name="fullName" value={formData.fullName} onChange={handleChange} className="form-control" required />
          </div>
          <div className="mb-3">
            <label className="form-label">Email</label>
            <input type="email" name="email" value={formData.email} onChange={handleChange} className="form-control" required />
          </div>
          <div className="mb-3">
            <label className="form-label">Số điện thoại</label>
            <input type="tel" name="phone" value={formData.phone} onChange={handleChange} className="form-control" required />
          </div>
          <div className="mb-3">
            <label className="form-label">Ghi chú</label>
            <textarea name="notes" value={formData.notes} onChange={handleChange} className="form-control" rows="4" />
          </div>
          <button type="submit" className="btn btn-primary w-100">Gửi thông tin</button>
        </form>
      </div>
    </div>
  );
}
