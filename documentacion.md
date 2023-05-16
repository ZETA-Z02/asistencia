# TRANSPORTES
# LISTA DE ENTIDADES

### E. personal 
- id_personal *(PK)*  --- INT AUTO INCREMENT
- nombre   ----VARCAHR(50)
- apellido ------VARCHAR(50)
- sexo  -----VARCAHR(10) 
- dni *(UQ)*  ----INT(8)
- telefono *(UQ)* ----INT(9)
- direccion ----int(9)
- ciudad ----VARCAHR(30)
- id_cargo *(FK)*


### E. Login
- id_login *(PK)*  --- INT AUTO INCREMENT
- id_personal  *(FK)* --- INT
- id_cargo *(FK)* ---INT
- usuario   ---VARCHAR(20)
- contraseña ---VARCAHR(20)



### E. cargo
- id_cargo *(PK)* ---INT AUTO INCREMENT
- cargo o especialidad ---varchar(25) 
- pago por hora --- float
- planilla ----boolean
- nivel de usuario ----int(3)
- turno ---varchar(20)
- horas de trabajo --- int ()
  

### E. asistencia 
- id_asistencia *(PK)* ---INT AUTO INCREMENT  
- id_loguin *(FK)* ----int
- tipo -----VARCHAR(15)  -> (salida y ingreso) 
- fecha ----date 
- hora ----time

### E. Ausencia
- id_ausencia **(PK)** ---INT AUTO INCREMENT
- id_personal *(FK)* --INT
- tipo ----VARCHAR(30)
- descripcion ---TEXT
- hora_inicio ---TIME
- hora_fin ---TIME
- duracion FLOAT
- fecha ---DATE


### E. Boleta 
- id_boleta *(PK)* ---INT AUTO INCREMENT
- id_personal *(FK)* --INT
- id_cargo *(FK)* --INT
- id_ausencia *(FK)* --INT
- fecha_boleta ---datetime
- horas_trabajadas ---FLOAT
- horas_extras ---FLOAT
- horas_ausentes ---FLOAT
- pago_total ---FLOAT
 

## RELACIONES
- La tabla "Login" tiene una relación M:1 con la tabla "Personal".
- La tabla "Personal" tiene una relación 1:M con la tabla "Asistencia".
- La tabla "Cargo" tiene una relación 1:M con la tabla "Personal".
- La tabla "Loguin" tiene una relación 1:M con la tabla "Asistencia".
- La tabla "Boleta" tiene una relación M:1 con la tabla "Personal", una relación M:1 con la tabla "Cargo" y una relación M:1 con la tabla "Ausencia".
- La tabla "Ausencia" tiene una relación 1:N con la tabla "Boleta".


1. Personal(id_personal) a Cargo(id_cargo)-->La entidad Personal tiene una relación muchos-a-uno con la entidad Cargo, ya que muchos empleados pueden tener el mismo cargo. La clave foránea id_cargo en la tabla Personal establece esta relación.
2. Personal(id_personal) a Login(id_personal)-->La entidad Loguin tiene una relación muchos-a-uno con la entidad Personal, ya que muchos logins pueden pertenecer a un solo empleado. La clave foránea id_personal en la tabla Loguin establece esta relación.
3. Cargo(id_cargo) a Login(id_cargo)-->La entidad Loguin tiene una relación muchos-a-uno con la entidad Personal, ya que muchos logins pueden pertenecer a un solo empleado. La clave foránea id_personal en la tabla Loguin establece esta relación.
4. Login(id_login) a Asistencia(id_login)-->La entidad Asistencia tiene una relación muchos-a-uno con la entidad Loguin, ya que muchos registros de asistencia pueden pertenecer a un solo login. La clave foránea id_loguin en la tabla Asistencia establece esta relación.
5. Personal(id_personal) a Boleta.(id_personal)-->La entidad Boleta tiene una relación muchos-a-uno con la entidad Personal, ya que muchas boletas pueden pertenecer a un solo empleado. La clave foránea id_personal en la tabla Boleta establece esta relación.
6. Cargo(id_cargo) a Boleta(id_cargo)-->La entidad Boleta tiene una relación muchos-a-uno con la entidad Cargo, ya que muchas boletas pueden pertenecer a un solo cargo. La clave foránea id_cargo en la tabla Boleta establece esta relación.
7. Ausencia(id_ausencia) a Boleta(id_ausencia)-->La entidad Boleta tiene una relacion muchos a uno con la entidad Ausencia, ya que muchas boletas pueden pertecener a una sola Ausencia.  La clave foránea id_ausencia en la tabla Boleta establece esta relación.




## REGLAS DE NEGOCIO

### Personal
1. crear personal 
2. leer a todo el personal
3. leer un personal en particular
4. actualizar a un personal 
5. eliminar a un personal 

### loguin
1. crear login 
2. leer a todo el login
3. leer un login en particular
4. actualizar a un login 
5. eliminar a un login  

### cargo
1. crear cargo 
2. leer a todo el cargo
3. leer un cargo en particular
4. actualizar a un cargo 
5. eliminar a un cargo 

#### asistencia

1. crear asistencia 
2. leer a todo el asistencia
3. leer un asistencia en particular
4. actualizar a un asistencia 
5. eliminar a un asistencia 

#### ausencia

1. crear ausencia
2. leer a todo ausencia
3. leer una ausencia en particular


### crear boleta 
1. crear boleta 
2. leer a t1odo el boleta
3. leer un boleta en particular
4. actualiza1r a un boleta 
5. elimina1r a un boleta 
6. cada que haya horas inasistidas restar horas trabajadas con horas de trabajo