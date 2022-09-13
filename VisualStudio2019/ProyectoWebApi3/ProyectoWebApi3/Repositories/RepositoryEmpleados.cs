using ProyectoWebApi3.Data;
using ProyectoWebApi3.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace ProyectoWebApi3.Repositories
{
    public class RepositoryEmpleados
    {
        EmpleadosContext context;

        public RepositoryEmpleados(EmpleadosContext context)
        {
            this.context = context;
        }

        public List<Empleado> GetEmpleados()
        {
            return this.context.Empleados.ToList();
        }

        public Empleado BuscarEmpleado(int idempleado)
        {
            return this.context.Empleados.SingleOrDefault(z => z.IdEmpleado == idempleado);
        }

        public List<Empleado> GetEmpleadosSalario(int salario)
        {
            return this.context.Empleados.Where(x => x.Salario >= salario).ToList();
        }

        public List<Empleado> GetEmpleados(String oficio, int departamento)
        {
            var consulta = from datos in context.Empleados
                           where datos.Oficio == oficio
                           && datos.Departamento == departamento
                           select datos;
            return consulta.ToList();
        }
    }
}
