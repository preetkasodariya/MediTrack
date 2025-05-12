import { useEffect, useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import axios from 'axios';

export function Viewstock() {

    const [data, setData] = useState([]);

    const Navigate = useNavigate();


    function loadstock() {
        axios.get("http://localhost/MediTrack/api/getallstocks.php")
            .then((response) => {
                if (response.status == 200) {
                    var jsondata = response.data;
                    setData(jsondata);
                }

            }).catch((error) => {
                console.log(error);
            });
    }



    useEffect(() => {
        loadstock();

    }, [])


    function hanldeDelete(stock_id) {
        var formdata = new FormData();
        formdata.append("stock_id", stock_id);

        axios.post("http://localhost/MediTrack/api/deletestock.php", formdata)
            .then((response) => {
                loadstock();
            }).catch((error) => {
                console.log(error);
            })
    }

    function hanldeedit(id){
        Navigate("/editstock/"+id);
    }


    return (<>
        <main>
            <div className="header">
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <h2>Stock List</h2>
                        </div>
                        <div className="col text-end">
                            <Link className="btn btn-sm btn-dark" to="/addstock">Add stock</Link>
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
                                        <th scope="col">Medicine Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Payment done?</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {
                                        data && data.map((row) => {
                                            return (<>

                                                <tr>
                                                    <th scope="row">{ }</th>
                                                    <td>{row.name}</td>
                                                    <td>{row.medicine_name}</td>
                                                    <td>{row.quantity}</td>
                                                    <td>{row.ispay}</td>
                                                    <td>
                                                        <button onClick={(e) => hanldeDelete(row.stock_id)} className="btn btn-sm btn-danger deletebtn">Delete</button>
                                                        <button onClick={(e) => hanldeedit(row.stock_id)} className="btn btn-sm btn-primary">Edit</button>

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