
import { useRef } from "react";
import { Link } from "react-router-dom";
import { useEffect } from "react";
import { useParams } from "react-router-dom";
import axios from 'axios';

export function Editcompany() {


    const company_name = useRef();
    const { id } = useParams();


    useEffect(() => {
        var formdata = new FormData();
        formdata.append("id", id);

        //API
        axios.post("http://localhost/MediTrack/api/getsinglecompany.php", formdata)
            .then((response) => {
                if (response.status == 200) {
                    var json = response.data;
                    company_name.current.value = json.company_name;

                }
            }).catch((error) => {
                console.log(error);
            })


    }, [id])

    function updatecompany(e) {
        e.preventDefault();
        let cname = company_name.current.value;
        //API
        var formdata = new FormData();
        formdata.append("cmpnyname", cname);
        formdata.append("id",id);
        
        axios.post("http://localhost/MediTrack/api/updatecompany.php", formdata)
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

                            <form method="POST" onSubmit={updatecompany}>
                                <div className="mb-3">
                                    <label className="form-label">Company Name</label>
                                    <input ref={company_name} type="text" className="form-control" id="cmpnyname" aria-describedby="emailHelp" />
                                </div>

                                <button type="submit" className="btn btn-primary">Save</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </main>
    </>);
}