
import { useRef } from "react";
import { Link, useParams } from "react-router-dom";
import { useEffect } from "react";
import axios from 'axios';


export function Editretailer() {


    const { id } = useParams();


    const Reatiler_name = useRef();
    const Reatiler_Address = useRef();
    const Reatiler_Mobile = useRef();
    const Reatiler_Email = useRef();

    useEffect(() => {
        var formdata = new FormData();
        formdata.append("id",id);

        //API
        axios.post("http://localhost/MediTrack/api/getsingleretailer.php",formdata)
            .then((response) => {
                if (response.status==200) {
                    var json = response.data;
                    Reatiler_name.current.value = json.company_name;
                    Reatiler_Address.current.value = json.address;
                    Reatiler_Mobile.current.value = json.mobile_no;
                    Reatiler_Email.current.value = json.email_id;
                  
                }
            }).catch((error) => {
                console.log(error);
            })


    }, [id])





    function updateretailer(e) {
        e.preventDefault();
        let nm = Reatiler_name.current.value;
        let add = Reatiler_Address.current.value;
        let cont = Reatiler_Mobile.current.value;
        let email = Reatiler_Email.current.value;
        //API
        var formdata = new FormData();
        formdata.append("Retname", nm);
        formdata.append("Retadd", add);
        formdata.append("Retcontact", cont);
        formdata.append("RetEmail", email);
        formdata.append("id",id);

        axios.post("http://localhost/MediTrack/api/updateretailer.php", formdata)
            .then((response) => {
                console.log(response);
                if (response.data.success) {   // <-- adjust based on your API's actual response
                    window.location.href = "/viewretailer";  // Redirect to Viewcompany page
                } else {
                    alert("Failed to add company!");
                }
            }).catch((error) => {
                console.log(error);
            })


    }


    return (<>
        <main>
            <div className="header">
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <h2>Add Retailer Details</h2>
                        </div>
                        <div className="col text-end">
                            <Link className="btn btn-sm btn-dark" to="/viewretailer">View Retailer</Link>
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

                            <form method="POST" onSubmit={updateretailer}>
                                <div className="mb-3">
                                    <label className="form-label">Retailer Name</label>
                                    <input ref={Reatiler_name} type="text" className="form-control" id="Retname" aria-describedby="emailHelp" />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Retailer Address</label>
                                    <input ref={Reatiler_Address} type="text" className="form-control" id="Retadd" aria-describedby="emailHelp" />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Retailer Contact</label>
                                    <input ref={Reatiler_Mobile} type="text" className="form-control" id="Retcontact" aria-describedby="emailHelp" />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Retailer Email</label>
                                    <input ref={Reatiler_Email} type="text" className="form-control" id="RetEmail" aria-describedby="emailHelp" />
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