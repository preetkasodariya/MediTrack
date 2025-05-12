import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import axios from 'axios';
import { useNavigate } from "react-router-dom";

export function Viewcompany() {


    const[data,setData] = useState([]);
    const Navigate = useNavigate();


    function loadcompany()
    {
        axios.get("http://localhost/MediTrack/api/getallcompany.php")
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
        loadcompany();
    },[])


    function hanldeDelete(company_id)
    {
        var formdata = new FormData();
        formdata.append("company_id",company_id);

        axios.post("http://localhost/MediTrack/api/deletecompany.php",formdata)
        .then((response)=>{
            loadcompany();
        }).catch((error)=>{
            console.log(error);
        })
    }

    function handleedit(id){
        Navigate("/editcompany/"+id);
    }
    

    return (<>
        <main>
            <div className="header">
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <h2>Comapany List</h2>
                        </div>
                        <div className="col text-end">
                            <Link className="btn btn-sm btn-dark" to="/addcompany">Add Company</Link>
                        </div>
                    </div>
                </div>
            </div>

            <div className="main-body mt-5">
                <div className="container">
                    <div className="card" >
                        <div className="card-header">
                            View all Companies
                        </div>
                        <div className="card-body">
                            <table className="table  table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {
                                        data && data.map((row)=>{
                                            return (<>
                
                                            <tr>
                                                <th scope="row">{row.company_id}</th>
                                                <td>{row.company_name}</td>
                                                <td>
                                                    <button onClick={(e)=>hanldeDelete(row.company_id)} className="btn btn-sm btn-danger deletebtn">Delete</button>
                                                    <button  className="btn btn-sm btn-primary"onClick={(e)=>handleedit(row.company_id)}>Edit</button>

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