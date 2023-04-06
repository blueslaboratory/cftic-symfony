using ProyectoWebApi3.Models;

using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace ProyectoWebApi3.Data
{
    public class EmpleadosContext : DbContext
    {
        public EmpleadosContext(DbContextOptions options) : base(options)
        { }

        public DbSet<Models.Empleado> Empleados { get; set; }
    }
}
