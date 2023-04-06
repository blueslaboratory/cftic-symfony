using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

// 08/09/2022
// 76 - WEB API EMPLEADOS CORE

namespace ProyectoWebApi3.Models
{
    [Table("EMP")] // deserializame la tabla EMP en la tabla empleado
    public class Empleado
    {
        [Key]
        [Column("EMP_NO")]
        public int IdEmpleado { get; set; }
        [Column("APELLIDO")]
        public String Apellido { get; set; }
        [Column("OFICIO")]
        public String Oficio { get; set; }
        [Column("SALARIO")]
        public int Salario { get; set; }
        [Column("DEPT_NO")]
        public int Departamento { get; set; }
    }

}