import { useRef,useEffect } from "react";
import axios from 'axios';
import { useNavigate} from 'react-router-dom';
export function Logout()
{
    const navigate=useNavigate();
    useEffect(()=>{
        sessionStorage.clear();
       // navigate("/");
       window.location = '/';
    })
    return(
        <>
        <h2>This is logout page</h2>
        </>
    )
}