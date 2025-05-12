import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { FaRupeeSign, FaCalendarWeek, FaCalendarAlt } from 'react-icons/fa'; // Icons

export function Dashboard() {
    const [data, setdata] = useState([]);
    const navigate = useNavigate();
    const [daily, setDaily] = useState(0);
    const [weekly, setWeekly] = useState(0);
    const [monthly, setMonthly] = useState(0);

    function loadappointment() {
        axios.get("http://localhost/MediTrack/api/getpendingappoinment.php")
            .then((response) => {
                if (response.status === 200) {
                    setdata(response.data);
                }
            }).catch((error) => console.log(error));
    }

    function loaddashboard() {
        axios.get("http://localhost/MediTrack/api/getdashboard.php")
            .then((response) => {
                if (response.status === 200) {
                    var json = response.data;
                    setDaily(json.today_sale);
                    setWeekly(json.week_sale);
                    setMonthly(json.month_sale);
                }
            }).catch((error) => console.log(error));
    }

    useEffect(() => {
        loadappointment();
        loaddashboard();
    }, []);

    function handleview(id) {
        navigate("/detailappointments/" + id);
    }

    return (
        <main className="container mt-5">
            {/* Summary Cards */}
            <div className="row mb-5">
                <div className="col-md-4 mb-3">
                    <div className="card text-center shadow p-3" style={{ borderRadius: '15px' }}>
                        <div className="card-body">
                            <FaRupeeSign size={40} className="text-success mb-2" />
                            <h3 className="card-title">Rs. {daily}</h3>
                            <p className="text-muted">Daily Sales</p>
                        </div>
                    </div>
                </div>
                <div className="col-md-4 mb-3">
                    <div className="card text-center shadow p-3" style={{ borderRadius: '15px' }}>
                        <div className="card-body">
                            <FaCalendarWeek size={40} className="text-primary mb-2" />
                            <h3 className="card-title">Rs. {weekly}</h3>
                            <p className="text-muted">Weekly Sales</p>
                        </div>
                    </div>
                </div>
                <div className="col-md-4 mb-3">
                    <div className="card text-center shadow p-3" style={{ borderRadius: '15px' }}>
                        <div className="card-body">
                            <FaCalendarAlt size={40} className="text-warning mb-2" />
                            <h3 className="card-title">Rs. {monthly}</h3>
                            <p className="text-muted">Monthly Sales</p>
                        </div>
                    </div>
                </div>
            </div>

            {/* Appointments Table */}
            <div className="card shadow-sm" style={{ borderRadius: '15px' }}>
                <div className="card-header bg-light">
                    <h5 className="mb-0">View All Appointments</h5>
                </div>
                <div className="card-body table-responsive">
                    <table className="table table-hover align-middle">
                        <thead className="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Patient Name</th>
                                <th>Add Date</th>
                                <th>Time</th>
                                <th>Doctor Name</th>
                                <th>Problem</th>
                                <th>Weight</th>
                                <th>Patient Type</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Medicine</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {data.length > 0 ? (
                                data.map((row, index) => (
                                    <tr key={row.appointment_id}>
                                        <td>{index + 1}</td>
                                        <td>{row.firstname}</td>
                                        <td>{row.Add_date}</td>
                                        <td>{row.Add_time}</td>
                                        <td>{row.first_name}</td>
                                        <td>{row.problem}</td>
                                        <td>{row.weight}</td>
                                        <td>{row.patient_type}</td>
                                        <td>Rs. {row.ammount}</td>
                                        <td>{row.payment_type}</td>
                                        <td>{row.medicine_take}</td>
                                        <td>
                                            <button
                                                className="btn btn-sm btn-outline-primary"
                                                onClick={() => handleview(row.appointment_id)}
                                            >
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan="12" className="text-center text-muted p-5">
                                        <h5>No Appointments Found</h5>
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    );
}
