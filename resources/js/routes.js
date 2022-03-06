
import EmployeeIndex from "./components/employee/Index";
import EmployeeCreate from "./components/employee/Create";
import EmployeeEdit from "./components/employee/Edit";
export const routes = [
    {
        path:"/employee",
        name:"EmployeeIndex",
        component: EmployeeIndex
    },
    {
        path:"/employee/create",
        name:"EmployeeCreate",
        component:EmployeeCreate
    },
    {
        path:"/employee/edit",
        name:"EmployeeEdit",
        component:EmployeeEdit
    }
];