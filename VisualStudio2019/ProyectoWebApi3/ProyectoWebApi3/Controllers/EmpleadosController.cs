using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using ProyectoWebApi3.Models;
using ProyectoWebApi3.Repositories;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace ProyectoWebApi3.Controllers
{
    // 76 - WEB API EMPLEADOS CORE
    // https://localhost:44356/api/empleados/
    // https://localhost:44319/api/empleados/7698

    // Despues de publicar:
    // https://proyectowebapi3.azurewebsites.net/api/empleados/
    // https://proyectowebapi3.azurewebsites.net/api/empleados/7698

    [Route("api/[controller]")]
    [ApiController]
    public class EmpleadosController : ControllerBase
    {

        RepositoryEmpleados repo;

        public EmpleadosController(RepositoryEmpleados repo)
        {
            this.repo = repo;
        }

        [HttpGet]
        public ActionResult<List<Empleado>> Get()
        {
            return this.repo.GetEmpleados();
        }

        [HttpGet("{id}")]
        public ActionResult<Empleado> Get(int id)
        {
            return this.repo.BuscarEmpleado(id);
        }


        // https://localhost:44319/api/empleados/VENDEDOR/30
        // https://proyectowebapi3.azurewebsites.net/api/empleados/VENDEDOR/30
        [HttpGet("{oficio}/{departamento}")]
        public ActionResult<List<Empleado>> GetEmpleados(String oficio, int departamento)
        {
            return this.repo.GetEmpleados(oficio, departamento);
        }


        // Devuelve registros con salarios mayores al que le pasas:
        // https://localhost:44319/api/empleados/GetEmpleadosSalario/300000
        // https://proyectowebapi3.azurewebsites.net/api/empleados/GetEmpleadosSalario/300000
        [HttpGet("[action]/{salario}")]
        public ActionResult<List<Empleado>> GetEmpleadosSalario(int salario)
        {
            return this.repo.GetEmpleadosSalario(salario);
        }
    }
}

