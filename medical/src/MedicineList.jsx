import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { Link } from "react-router-dom";


export function MedicineList() {

    const [data, setdata] = useState([]);

    function loadmedicine(){
        axios.get("http://localhost/MediTrack/api/getallmedicines.php")
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
            loadmedicine();
    }, [])


    const navigate = useNavigate();


    function openAddMedicine() {
        navigate("/addmedicine");
    }


    function handleEdit(id)
    {
        navigate("/editmedicine/"+id);
    }

    function  handleDelete(medicine_id)
    {
        var formdata = new FormData;
        formdata.append("medicine_id",medicine_id);

        axios.post("http://localhost/MediTrack/api/deletemedicine.php",formdata)
        .then((response)=>{
            loadmedicine();
        }).catch((error)=>{
            console.log(error);
        })
    }

    return (<>
        <main>
            <div className="header">
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <h2>Manage Medicine</h2>
                        </div>
                        <div className="col text-end">
                            <button className="btn btn-sm btn-dark" onClick={openAddMedicine}>Add</button>
                        </div>
                    </div>
                </div>
            </div>

            <div className="main-body mt-5">
                <div className="container">
                    <div className="card" >
                        <div className="card-header">
                            View all medicines
                        </div>
                        <div className="card-body">
                            <table className="table  table-bordered">
                                <thead>
                                    <tr>
                                        {/* <th scope="col">#</th> */}
                                        <th scope="col">Company</th>
                                        <th scope="col">Medicine Image</th>
                                        <th scope="col">Medicine Name</th>
                                        <th scope="col">Retail Price</th>
                                        <th scope="col">Sell Price</th>
                                        
                                        <th scope="col">Stock</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    {
                
                                        data && data.map((row) => {
            
                                            return (<>
                                                <tr>
                                                    {/* <td>{}</td> */}
                                                    <td>{row.company_name}</td>
                                                    <td>
                                                        <img className="medicineimg" src={row.medicine_image}></img>
                                                    </td>
                                                    <td>{row.medicine_name}</td>
                                                    <td>Rs.{row.retail_price}</td>
                                                    <td>Rs.{row.sell_price}</td>
                                                    <td>{row.stock}</td>
                                                    <td>
                                                         <button className='btn btn-sm btn-danger deletebtn' onClick={(e)=>handleDelete(row.medicine_id)}>Delete</button>
                                                         <button className='btn btn-sm btn-primary' onClick={(e)=>handleEdit(row.medicine_id)}>Edit</button>
                                                   
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