import { Link } from "react-router-dom";

export function Header()
{
    return (<>
    {
        sessionStorage.getItem("id") && <nav className="navbar navbar-expand-lg bg-dark"  data-bs-theme="dark">
        <div className="container-fluid">
            <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                <li className="nav-item">
                <Link className="nav-link active" aria-current="page" to="/dashboard">Dashboard</Link>
                </li>
                <li className="nav-item">
                 <Link className="nav-link active" to="/medicine">Medicine</Link>
                </li>
                <li className="nav-item">
                 <Link className="nav-link active" to="/company">Company</Link>
                </li>
                <li className="nav-item">
                 <Link className="nav-link active" to="/viewretailer">Retailer</Link>
                </li>
                <li className="nav-item">
                 <Link className="nav-link active" to="/viewstock">Stock</Link>
                </li>
                <li className="nav-item">
                 <Link className="nav-link active" to="/viewappointment">Appointments</Link>
                </li>
                <li className="nav-item">
                 <Link className="nav-link active" to="/logout">Logout</Link>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    }
    
    </>);
}