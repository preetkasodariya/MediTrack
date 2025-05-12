import { useEffect, useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import axios from 'axios';

export function ViewRetailer() {


    const[data,setData] = useState([]);
    const Navigate = useNavigate();


    function loadretailer()
    {
        axios.get("http://localhost/MediTrack/api/getallretailer.php")
        .then((response)=>{
            if(response.status==200)
            {
                var jsondata = response.data;
                setData(jsondata);
            }

        }).catch((error)=>{
            console.log(error);
        });
    }

    useEffect(()=>{
        loadretailer();
    },[])


    function hanldeDelete(Retailer_id)
    {
        var formdata = new FormData();
        formdata.append("Retailer_id",Retailer_id);

        axios.post("http://localhost/MediTrack/api/deleteretailer.php",formdata)
        .then((response)=>{
            loadretailer();
        }).catch((error)=>{
            console.log(error);
        })
    }

    function handleedit(id){
        Navigate("/editretailer/"+id);
    }
    

    return (<>
        <main>
            <div className="header">
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <h2>Retailer List</h2>
                        </div>
                        <div className="col text-end">
                            <Link className="btn btn-sm btn-dark" to="/addretailer">Add Retailer</Link>
                        </div>
                    </div>
                </div>
            </div>

            <div className="main-body mt-5">
                <div className="container">
                    <div className="card" >
                        <div className="card-header">
                            View all Retailers
                        </div>
                        <div className="card-body">
                            <table className="table  table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Retailer Name</th>
                                        <th scope="col">Retailer Address</th>
                                        <th scope="col">Retailer Number</th>
                                        <th scope="col">Retailer Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {
                                        data && data.map((row)=>{
                                            return (<>
                
                                            <tr>
                                                <th scope="row">{row.Retailer_id}</th>
                                                <td>{row.name}</td>
                                                <td>{row.address}</td>
                                                <td>{row.mobile_no}</td>
                                                <td>{row.email_id}</td>
                                                <td>
                                                    <button onClick={(e)=>hanldeDelete(row.Retailer_id)} className="btn btn-sm btn-danger deletebtn">Delete</button>
                                                    <button  className="btn btn-sm btn-primary" onClick={(e)=>handleedit(row.Retailer_id)}>Edit</button>

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