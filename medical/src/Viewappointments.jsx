import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { Link } from "react-router-dom";

export function Viewappointment() {


    const [data, setdata] = useState([]);

    function loadappointment() {
        axios.get("http://localhost/MediTrack/api/getallappointment.php")
            .then((response) => {
                if (response.status == 200) {
                    var jsondata = response.data;
                    setdata(jsondata);
                }

            }).catch((error) => {
                console.log(error);
            });
    }

    useEffect(() => {
        loadappointment();
    }, [])
         
    const navigate = useNavigate();

    function handleview(id) {
            navigate("/detailappointments/"+id);
    }

    return (<>
        <main>
            <div className="header">
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <h2>Appointments</h2>
                        </div>

                    </div>
                </div>
            </div>

            <div className="main-body mt-5">
                <div className="container">
                    <div className="card" >
                        <div className="card-header">
                            View all Treatments
                        </div>
                        <div className="card-body">
                            <table className="table  table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Add date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">doctor Name</th>
                                        {/* <th scope="col">Problem</th> */}
                                        <th scope="col">weight</th>
                                        <th scope="col">patient_type</th>
                                        <th scope="col">ammount</th>
                                        <th scope="col">Payment type</th>

                                        {/* <th scope="col">Medicine</th> */}





                                    </tr>
                                </thead>
                                <tbody>
                                    {

                                        data && data.map((row) => {

                                            return (<>
                                                <tr>
                                                    <td>{ }</td>
                                                    <td>{row.firstname}</td>
                                                    <td>{row.Add_date}</td>
                                                    <td>{row.Add_time}</td>
                                                    <td>{row.first_name}</td>
                                                    {/* <td>{row.problem}</td> */}
                                                    <td>{row.weight}</td>
                                                    <td>{row.patient_type}</td>
                                                    <td>{row.ammount}</td>
                                                    <td>{row.payment_type}</td>
                                                    {/* <td>{row.medicine_take}</td> */}


                                                    <td>

                                                        <button  className='btn btn-sm btn-primary' onClick={(e) => handleview(row.appointment_id)}>View</button>

                                                    </td>
                                                </tr>
                                            </>);
                                        })
                                    }

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </>);

}