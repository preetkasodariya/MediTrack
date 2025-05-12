
import { useRef } from "react";
import { Link } from "react-router-dom";
import axios from 'axios';
import { useState } from "react";
import { useEffect } from "react";

export function AddStock() {

    const [payment, setPayment] = useState("");


    const togglePayment = (value) => {
        setPayment(prev => (prev === value ? "" : value));  // toggle
    };


    const Retailer_id = useRef();
    const Medicine_id = useRef();
    const Quantity = useRef();
    const paymentRef = useRef(null);


    function addstock(e) {
        e.preventDefault();
        let rid = Retailer_id.current.value;
        let mid = Medicine_id.current.value;
        let qty = Quantity.current.value;
        let pay = Array.from(paymentRef.current.querySelectorAll('input[name="payment"]'))
        .find(input => input.checked)?.id === "payYes" ? "yes" : "no";
        //API
        var formdata = new FormData();
        formdata.append("rid",rid);
        formdata.append("mid",mid);
        formdata.append("qty",qty);
        formdata.append("pay", pay);

        axios.post("http://localhost/MediTrack/api/addstock.php",formdata)
        .then((response)=>{
            console.log(response);
            if (response.data.success) {   // <-- adjust based on your API's actual response
                window.location.href = "/viewstock";  // Redirect to Viewcompany page
            } else {
                alert("Failed to add company!");
            }
        }).catch((error)=>{
            console.log(error);
        })
       

    }
    const[data,setData] = useState([]);
    const[retdata,setRetData] = useState([]);


    function getmedicine(){
        axios.get("http://localhost/MediTrack/api/getallmedicines.php")
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

    
    function getretailer(){
        axios.get("http://localhost/MediTrack/api/getallretailer.php")
        .then((response)=>{
            if(response.status==200)
            {
                var jsondata = response.data;
                setRetData(jsondata);
            }
    
        }).catch((error)=>{
            console.log(error);
        });

    }

    

    useEffect(() =>{
        getmedicine();
        getretailer();
    },[]);




    // function addstock(e)
    // {
    //     e.preventDefault();
    //     let rid = Retailer_id.current.value;
    //     let mid = Medicine_id.current.value;
    //     let qty = Quantity.current.value;
    //     let pay = Payment.current.value;
    //     //API
    //     var formdata = new FormData();
    //     formdata.append("rid",rid);
    //     formdata.append("mid",mid);
    //     formdata.append("qty",qty);
    //     formdata.append("pay",pay);

    //     axios.post("http://localhost/MediTrack/api/stockadd.php",formdata)
    //     .then((response)=>{
    //         console.log(response);
    //     }).catch((error)=>{
    //         console.log(error);
    //     })


    // }


    return (<>
        <main>
            <div className="header">
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <h2>Add Retailer Details</h2>
                        </div>
                        <div className="col text-end">
                            <Link className="btn btn-sm btn-dark" to="/viewstock">View Stock</Link>
                        </div>
                    </div>
                </div>
            </div>


            <div className="main-body mt-5">
                <div className="container">
                    <div className="card" >
                        <div className="card-header">
                            Add Retailer
                        </div>


                        <div className="card-body">

                            <form method="POST" onSubmit={addstock}>
                                <div className="mb-3">
                                    <label className="form-label">Retailer id</label>
                                    <select ref={Retailer_id} className="form-control" id="mid" aria-describedby="emailHelp">
                                        <option>Please select Retailer</option>
                                        {
                                            retdata && retdata.map((row)=>{
                                                return (<>
                                                    <option value={row.Retailer_id}>{row.name}</option>
                                                </>);
                                            })
                                        }
                                    </select>
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Medicine name</label>
                                    <select ref={Medicine_id} className="form-control" id="mid" aria-describedby="emailHelp">
                                        <option>Please select medicine name</option>
                                        {
                                            data && data.map((row)=>{
                                                return (<>
                                                    <option value={row.medicine_id}>{row.medicine_name}</option>
                                                </>);
                                            })
                                        }
                                    </select>
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Quantity</label>
                                    <input ref={Quantity} type="text" className="form-control" id="qty" aria-describedby="emailHelp" />
                                </div>


                                <div className="mb-3">
                                    <label className="form-label">Payment Done</label>
                                    <div className="d-flex" ref={paymentRef}> {/* ✅ Use ref here */}
                                        <div className="form-check form-check-inline">
                                            <input
                                                className="form-check-input"
                                                type="radio"
                                                name="payment"
                                                id="payYes"
                                                checked={payment === "yes"}
                                                onClick={() => togglePayment("yes")}
                                                readOnly
                                            />
                                            <label className="form-check-label" htmlFor="payYes">Yes</label>
                                        </div>
                                        <div className="form-check form-check-inline">
                                            <input
                                                className="form-check-input"
                                                type="radio"
                                                name="payment"
                                                id="payNo"
                                                checked={payment === "no"}
                                                onClick={() => togglePayment("no")}
                                                readOnly
                                            />
                                            <label className="form-check-label" htmlFor="payNo">No</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" className="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </main>
    </>);
}