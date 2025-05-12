import { useRef } from "react";
import axios from 'axios';
import { useNavigate} from 'react-router-dom';

export function Login() {


    const username = useRef();
    const password = useRef();

    const navigate = useNavigate();
    

    function handleLogin(e)
    {
        e.preventDefault();
        var uname = username.current.value;
        var pwd = password.current.value;

        var formdata = new FormData();
        formdata.append("uname",uname);
        formdata.append("pwd",pwd);

        axios.post("http://localhost/MediTrack/api/login.php",formdata)
        .then((response)=>{
            if(response.status==200)
            {
                var json = response.data;
                if(json.status == true)
                {
                    var message = json.message;
                    sessionStorage.setItem("islogin",true);
                    sessionStorage.setItem("id",json.userdata.staff_id);
                    //navigate("/dashboard");
                    window.location = '/dashboard';
                }
                else
                {
                    var message = json.message;
                    alert(message);
                }
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

                        <h2>LOGIN</h2>

                    </div>
                </div>
            </div>


            <div className="main-body mt-5">
                <div className="container">
                    <div className="card" >
                        <div className="card-header">
                            Login
                        </div>
                        <div className="card-body">

                            <form method="POST" onSubmit={handleLogin}>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input ref={username} type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/>
                                        
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input ref={password} type="password" class="form-control" id="exampleInputPassword1"/>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </main>
    </>);
}