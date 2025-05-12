
import { useRef } from "react";
import { Link } from "react-router-dom";
import axios from 'axios';
export function Addcompany() {


    const company_name = useRef();



    function addcompany(e) {
        e.preventDefault();
        let nm = company_name.current.value;
        //API
        var formdata = new FormData();
        formdata.append("cname", nm);

        axios.post("http://localhost/MediTrack/api/companyadd.php", formdata)
            .then((response) => {
                console.log(response);
                if (response.data.success) {   // <-- adjust based on your API's actual response
                    window.location.href = "/viewcompany";  // Redirect to Viewcompany page
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
                            <h2>ADD YOUR COMPANY</h2>
                        </div>
                        <div className="col text-end">
                            <Link className="btn btn-sm btn-dark" to="/viewcompany">View Company</Link>
                        </div>
                    </div>
                </div>
            </div>


            <div className="main-body mt-5">
                <div className="container">
                    <div className="card" >
                        <div className="card-header">
                            Add Company
                        </div>


                        <div className="card-body">

                            <form method="POST" onSubmit={addcompany}>
                                <div className="mb-3">
                                    <label className="form-label">Company Name</label>
                                    <input ref={company_name} type="text" className="form-control" id="cmpnyname" aria-describedby="emailHelp" />
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