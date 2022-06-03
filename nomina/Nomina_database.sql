create database business_1;

use business_1;

create table workers (

id int auto_increment , nombre varchar(50) , apellido_paterno varchar(50), apellido_materno varchar(50) , work_hours int ,  primary key (id)


);

create table worker_wage (

	worker_id int auto_increment , normal_hour float , extra_hour float , primary key (worker_id)

);

insert into workers (nombre , apellido_paterno, apellido_materno , work_hours) values ("Jorge" , "El" , "Curioso" , 40) , ("Jheronimus" , "Van" , "Aken" , 40) , ("Francisco" , "de Goya" , " y Lucientes" , 40),
("Payaso" , "Bailarin" , "II" , 41) , ("Marco Aurelio" , "Roma" , "Invicta" , 60) , ("Diego" , "Rodrigo" , "Velazquez" , 42) , ("Manuel Maria" , "Ponce" , "Cuellar" , 50) , ("Macedonio" , "Alcala" , "Prieto" , 45);


insert into worker_wage values ( 1 , 5.00 , normal_hour * 2);
insert into worker_wage values ( 2 , 200.00 , normal_hour * 2);
insert into worker_wage values ( 3 , 200.00 , normal_hour * 2);
insert into worker_wage values ( 4 , 50.00 , normal_hour * 2);
insert into worker_wage values ( 5 , 1250.00 , normal_hour * 2);
insert into worker_wage values ( 6 , 200.00 , normal_hour * 2);
insert into worker_wage values ( 7 , 200.00 , normal_hour * 2);
insert into worker_wage values ( 8 , 200.00 , normal_hour * 2);

select * from workers;
select * from worker_wage;

