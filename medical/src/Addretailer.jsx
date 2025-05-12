
import { useRef } from "react";
import { Link } from "react-router-dom";
import axios from 'axios';
export function Addretailer() {


    const Reatiler_name = useRef();
    const Reatiler_Address = useRef();
    const Reatiler_Mobile = useRef();
    const Reatiler_Email = useRef();




    function addretailer(e)
    {
        e.preventDefault();
        let nm = Reatiler_name.current.value;
        let add = Reatiler_Address.current.value;
        let cont = Reatiler_Mobile.current.value;
        let email = Reatiler_Email.current.value;
        //API
        var formdata = new FormData();
        formdata.append("Retname",nm);
        formdata.append("Retadd",add);
        formdata.append("Retcontact",cont);
        formdata.append("RetEmail",email);

        axios.post("http://localhost/MediTrack/api/retaileradd.php",formdata)
        .then((response)=>{
            console.log(response);
            if (response.data.success) {   // <-- adjust based on your API's actual response
                window.location.href = "/viewretailer";  // Redirect to Viewcompany page
            } else {
                alert("Failed to add company!");
            }
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

                            <form method="POST" onSubmit={addretailer}>
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

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </main>
    </>);
}