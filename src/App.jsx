import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import UserInfoForm from './UserInfoForm';
import UserInfoDisplay from './UserInfoDisplay';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<UserInfoForm />} />
        <Route path="/display" element={<UserInfoDisplay />} />
      </Routes>
    </Router>
  );
}

export default App;
