create or replace view empresas_sin_ubicacion as 
select empresa.* from empresa 
left join ubicacion on empresa.id=ubicacion.empresa_id 
where ubicacion.empresa_id is null;