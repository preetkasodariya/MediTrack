import axios from "axios"
import { useState, useEffect, useRef } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { Link } from "react-router-dom";


export function Detailappointments() {

    const [data, setdata] = useState(null);
    const [meddata, setmeddata] = useState([]);
    const qty = useRef();
    const [total, setTotal] = useState("0");

    const { id } = useParams();


    function loadappointment() {
        var formdata = new FormData();
        formdata.append("id", id);
        axios.post("http://localhost/MediTrack/api/detailappointment.php", formdata)
            .then((response) => {
                if (response.status == 200) {
                    var jsondata = response.data;
                    setdata(jsondata);
                }

            }).catch((error) => {
                console.log(error);
            });
    }


    function loadtreatment() {
        var formdata = new FormData();
        formdata.append("id", id);
        axios.post("http://localhost/MediTrack/api/detailtreatment.php", formdata)
            .then((response) => {
                if (response.status == 200) {
                    var jsondata = response.data;
                    setmeddata(jsondata.data);
                    setTotal(jsondata.total);
                }

            }).catch((error) => {
                console.log(error);
            });
    }


    useEffect(() => {
        loadappointment();
        loadtreatment();

    }, [])

    function handleDelete(id) {
        var formdata = new FormData();
        formdata.append("id", id);
        axios.post("http://localhost/MediTrack/api/deletetratmentmedicine.php", formdata)
            .then((response) => {
                if (response.status == 200) {
                    var jsondata = response.data;
                    loadtreatment();
                }

            }).catch((error) => {
                console.log(error);
            });
    }
    function handleQtyChange(index, newQty) {
        setmeddata(prev => {
            const updated = [...prev];
            updated[index] = {
                ...updated[index],
                qty: newQty // allow string or number
            };
            return updated;
        });
    }
    function handleSave(row) {
        var formdata = new FormData();
        formdata.append("id", row.tm_id);
        formdata.append("qty", row.qty);
        axios.post("http://localhost/MediTrack/api/updatetratmentmedicine.php", formdata)
            .then((response) => {
                if (response.status == 200) {
                    var jsondata = response.data;
                    loadtreatment();
                }

            }).catch((error) => {
                console.log(error);
            });
    }
    const navigate = useNavigate();
    function createInvoice() {
        var formdata = new FormData();
        formdata.append("id", id);
        formdata.append("total", total);
        axios.post("http://localhost/MediTrack/api/createinvoice.php", formdata)
            .then((response) => {
                if (response.status == 200) {
                    var jsondata = response.data;
                    navigate("/viewappointment")
                }

            }).catch((error) => {
                console.log(error);
            });
    }


    if (!data) {
        return (<>
            <h2>Data Not available

            </h2>
        </>);
    }
    return (
        <>
            <main>
                <div className="header">
                    <div className="container">
                        <div className="row">
                            <div className="col">
                                <h2>Manage Medicine</h2>
                            </div>
                            <div className="col text-end">
                                <button className="btn btn-sm btn-dark"><Link className="editbtn" to={"/viewappointment"}>Back</Link></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="main-body mt-5">
                    <div className="container">
                        <div className="row">
                            <div className="col-4">
                                <div className="card" >
                                    <div className="card-header">
                                        Appointments
                                    </div>
                                    <div className="card-body" >
                                        <table className="table truncate align-middle">

                                            <tbody>


                                                <tr>
                                                    <th width="150px">Patient Name:</th>
                                                    <td>{data.firstname}</td>
                                                </tr>

                                                <tr>
                                                    <th width="150px">Date:</th>
                                                    <td>{data.Add_date}</td>
                                                </tr>

                                                <tr>
                                                    <th width="150px">Time:</th>
                                                    <td>{data.Add_time}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">Problem:</th>
                                                    <td>{data.problem}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">Weight:</th>
                                                    <td>{data.weight}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">Type:</th>
                                                    <td>{data.patient_type}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">Doctor name:</th>
                                                    <td>{data.first_name}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">Ammount:</th>
                                                    <td>{data.ammount}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">Payment Type:</th>
                                                    <td>{data.payment_type}</td>
                                                </tr>

                                                <tr>
                                                    <th width="150px">Medicine Take:</th>
                                                    <td>{data.medicine_take}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div className="col-8">
                              {
                                    data.medicine_take!="yes" && <div className="card box-1" >
                                    <div className="card-header">
                                        Treatments
                                    </div>

                                    <div className="card-body">
                                        <table className="treatment-table table table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Time</th>
                                                    <th>Medicine Name</th>
                                                    <th>Intake time</th>
                                                    <th>Dose</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {meddata &&
                                                    meddata.map((row, index) => (
                                                        <tr key={index}>
                                                            <td>{index + 1}</td>
                                                            <td>{row.time}</td>
                                                            <td>{row.medicine_name}</td>
                                                            <td>{row.type}</td>
                                                            <td>{row.dose}</td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    className="qty-input"
                                                                    value={row.qty}
                                                                    onChange={(e) => handleQtyChange(index, e.target.value)}
                                                                />
                                                            </td>
                                                            <td>{row.finalprice * row.qty}</td>
                                                            <td>
                                                                <div className="action-buttons">
                                                                    <button
                                                                        className="btn-delete"
                                                                        onClick={() => handleDelete(row.tm_id)}
                                                                    >
                                                                        Delete
                                                                    </button>
                                                                    <button
                                                                        className="btn-save"
                                                                        onClick={() => handleSave(row)}
                                                                    >
                                                                        Save
                                                                    </button>
                                                                </div>
                                                            </td>



                                                        </tr>
                                                    ))}

                                                <tr className="total-row">
                                                    <td colSpan="6" className="text-end"><strong>Total:</strong></td>
                                                    <td>{total}</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>



                                </div>
                              }

                              { data.medicine_take == "yes" && <div className="card box-1 mt-4">
                                    <div className="card-header">
                                        Summary Treatments
                                    </div>

                                    <div className="card-body">
                                        <table className="treatment-table table table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Time</th>
                                                    <th>Medicine Name</th>
                                                    <th>Intake time</th>
                                                    <th>Dose</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {meddata &&
                                                    meddata.map((row, index) => (
                                                        <tr key={index}>
                                                            <td>{index + 1}</td>
                                                            <td>{row.time}</td>
                                                            <td>{row.medicine_name}</td>
                                                            <td>{row.type}</td>
                                                            <td>{row.dose}</td>
                                                            <td>{row.qty}</td> {/* Not editable */}
                                                            <td>{row.finalprice * row.qty}</td>
                                                        </tr>
                                                    ))}

                                                <tr className="total-row">
                                                    <td colSpan="6" className="text-end"><strong>Total:</strong></td>
                                                    <td>{total}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                }
                                
                                


                            </div>
                        </div>



                       {
                         data.medicine_take!="yes" &&  <div className="col text-end box-2">

                         <button onClick={(e) => createInvoice()} className="btn btn-sm btn-dark">Create Invoice</button>
                     </div>
                       }
                    </div>
                </div>
            </main>
        </>
    )
}