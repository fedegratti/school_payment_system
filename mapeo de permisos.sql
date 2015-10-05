INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='ask' and resource.description='listFeesView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='ask' and resource.description='listAdmittedStudentsView';





