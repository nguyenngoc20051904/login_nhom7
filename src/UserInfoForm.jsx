import React, { useState } from 'react';

export default function UserInfoForm() {
  const [formData, setFormData] = useState({
    fullName: '',
    email: '',
    phone: '',
    notes: ''
  });

  const [submittedData, setSubmittedData] = useState(null);

  const handleChange = e => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleSubmit = e => {
    e.preventDefault();
    setSubmittedData(formData);
  };

  return (
    <div className="h-100 d-flex align-items-center justify-content-center bg-light" style={{ minHeight: '100vh' }}>
      <div className="card p-4 shadow" style={{ width: '500px' }}>
        <h3 className="text-center text-primary mb-4">Thu thập thông tin</h3>
        <form onSubmit={handleSubmit}>
          <div className="mb-3">
            <label className="form-label">Họ và tên</label>
            <input
              type="text"
              name="fullName"
              value={formData.fullName}
              onChange={handleChange}
              className="form-control"
              required
            />
          </div>
          <div className="mb-3">
            <label className="form-label">Email</label>
            <input
              type="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              className="form-control"
              required
            />
          </div>
          <div className="mb-3">
            <label className="form-label">Số điện thoại</label>
            <input
              type="tel"
              name="phone"
              value={formData.phone}
              onChange={handleChange}
              className="form-control"
              required
            />
          </div>
          <div className="mb-3">
            <label className="form-label">Ghi chú</label>
            <textarea
              name="notes"
              value={formData.notes}
              onChange={handleChange}
              className="form-control"
              rows="4"
            />
          </div>
          <button type="submit" className="btn btn-primary w-100">
            Gửi thông tin
          </button>
        </form>

        {submittedData && (
          <div className="card mt-4 shadow-sm p-3">
            <div className="card-body">
              <h5 className="card-title text-success">Thông tin đã nhập:</h5>
              <ul className="list-group list-group-flush">
                <li className="list-group-item"><strong>Họ và tên:</strong> {submittedData.fullName}</li>
                <li className="list-group-item"><strong>Email:</strong> {submittedData.email}</li>
                <li className="list-group-item"><strong>SĐT:</strong> {submittedData.phone}</li>
                <li className="list-group-item"><strong>Ghi chú:</strong> {submittedData.notes || 'Không có'}</li>
              </ul>
            </div>
          </div>
        )}
      </div>
    </div>
  );
}
