import { createRoot } from 'react-dom/client'
import 'bootstrap/dist/css/bootstrap.min.css';
import './index.css'
import { Dashboard } from './Dashboard'
import { MedicineList } from './MedicineList'
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { Header } from './Header';
import { AddMedicine } from './AddMedicine';
import { Login } from './login';
import { Viewcompany } from './Viewcompany';
import { Logout } from './Logout';
import { Addcompany } from './Addcompany';
import {Editmedicine} from './Editmedicine';
import { Editcompany } from './Editcompany';
import { Viewappointment } from './Viewappointments';
import {Detailappointments} from './Detailappointments';
import { Addretailer } from './Addretailer';
import { ViewRetailer } from './ViewRetailer';
import {Editretailer} from './Editretailer';
import {AddStock} from './AddStock';
import {Viewstock} from './Viewstock';
import {Editstock} from './Editstock';



createRoot(document.getElementById('root')).render(
  <BrowserRouter>
   <Header />
    <Routes>
      <Route element={<Dashboard />} path='/dashboard'></Route>
      <Route element={<MedicineList />} path='/medicine'></Route>
      <Route element={<AddMedicine />} path='/addmedicine'></Route>
      <Route element={<Login />} path='/'></Route>
      <Route element={<Viewcompany />} path='/company'></Route>
      <Route element={<Logout />} path='/logout'></Route>
      <Route element={<Addcompany />} path='/addcompany'></Route>
      <Route element={<Viewcompany />} path='/viewcompany'></Route>
      <Route element={<Editmedicine />} path='/editmedicine/:id'></Route>
      <Route element={<Editcompany/>} path='/editcompany/:id'></Route>
      <Route element={<Viewappointment/>} path='/viewappointment'></Route>
      <Route element={<Detailappointments/>} path='/detailappointments/:id'></Route>
      <Route element={<Addretailer/>} path='/addretailer'></Route>
      <Route element={<ViewRetailer/>} path='/viewretailer'></Route>
      <Route element={<Editretailer/>} path='/editretailer/:id'></Route>
      <Route element={<AddStock/>} path='/addstock'></Route>
      <Route element={<Viewstock/>} path='/viewstock'></Route>
      <Route element={<Editstock/>} path='/editstock/:id'></Route>





    </Routes>
  </BrowserRouter>
)
