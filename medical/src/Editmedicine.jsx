import axios from 'axios';
import { useRef } from "react";
import { useEffect, useState } from "react";
import {useNavigate, useParams } from "react-router-dom";

export function Editmedicine() {

    const {id} = useParams();

    
    const medicine_name = useRef();
    const medicine_image = useRef();
    const company_id = useRef();
    const retail_price = useRef();
    const selling_price = useRef();

    const[cid,setCid] = useState();
    const[image,setImage] = useState();



    useEffect(()=>{

        //API
        var formdata = new FormData();
        formdata.append("id",id);
        axios.post("http://localhost/MediTrack/api/getsinglemedicine.php",formdata)
        .then((response)=>{
            if(response.status==200)
            {
                var json = response.data;
                medicine_name.current.value = json.medicine_name;
                setCid(json.company_id);
                setImage(json.medicine_image);
                retail_price.current.value = json.retail_price;
                selling_price.current.value = json.sell_price;
        

            }
        }).catch((error)=>{
            console.log(error);
        })


    },[id])


function updatemedicine(e){
    e.preventDefault();
    let nm = medicine_name.current.value;
    let img = medicine_image.current.files[0];
    let Cid = company_id.current.value;
    let Retprice = retail_price.current.value;
    let Sellprice = selling_price.current.value;  

    //API
    var formdata = new FormData();
    formdata.append("mednm",nm);
    formdata.append("medimg",img);
    formdata.append("cid",Cid);
    formdata.append("retprice",Retprice);
    formdata.append("sellprice",Sellprice);
    formdata.append("mid",id);

   
    axios.post("http://localhost/MediTrack/api/updatemedicine.php",formdata)
    .then((response)=>{
        console.log(response);
        if (response.data.success) {   // <-- adjust based on your API's actual response
            window.location.href = "/medicine";  // Redirect to Viewcompany page
        } else {
            alert("Failed to add company!");
        }
    }).catch((error)=>{
        console.log(error);
    })
    
}

const[data,setData] = useState([]);


useEffect(()=>{
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
},[])


    const navigate = useNavigate();

    function viewmedicine ()
    {
        navigate('/medicine');
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
                            <button className="btn btn-sm btn-dark" onClick={viewmedicine}>View</button>
                        </div>
                    </div>
                </div>
            </div>

            <div className="main-body mt-5">
                <div className="container">
                    <div className="card" >
                        <div className="card-header">
                            Edit Medicine
                        </div>
                        <div className="card-body" >
                            <form method='POST' onSubmit={updatemedicine}>
                            <div className="mb-3">
                                    <label className="form-label">Company name</label>
                                    <select ref={company_id} className="form-control">
                                        <option>Please select company</option>
                                        {
                                            data && data.map((row)=>{
                                                if(cid == row.company_id)
                                                {
                                                    return (<>
                                                        <option selected value={row.company_id}>{row.company_name}</option>
                                                    </>);
                                                }
                                                else
                                                {
                                                    return (<>
                                                        <option value={row.company_id}>{row.company_name}</option>
                                                    </>);
                                                }
                                                
                                            })
                                        }
                                    </select>
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Medicine name</label>
                                    <input ref={medicine_name}  type="text" className="form-control" id="medicinename"  aria-describedby="emailHelp" />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Medicine Image</label>
                                    <input ref={medicine_image}  type="file" className="form-control" id="medicineimg"  aria-describedby="emailHelp" />
                                    <img className="medicineimg" src={image}></img>
                                </div>
                               
                                <div className="mb-3">
                                    <label className="form-label">Retail price</label>
                                    <input ref={retail_price}  type="number" className="form-control" id="retailprice"  aria-describedby="emailHelp" />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Selling price</label>
                                    <input ref={selling_price}  type="number" className="form-control" id="sellingprice"  aria-describedby="emailHelp" />
                                </div>
                               
                               
                                <button type="submit" className="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </>);
}