INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='ask' and resource.description='listFeesView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='ask' and resource.description='listAdmittedStudentsView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='ask' and resource.description='listStudentFeesView';


INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='listFeesView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='listAdmittedStudentsView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='addFeeView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='addFeeAction';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='updateFeeAction';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='deleteFeeAction';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='listFeesView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='listStudentFeesView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='payOrGrantFeeView';

INSERT into auth_mapper (roleid, resourceid) SELECT role.id,resource.id FROM role,resource 
WHERE role.description='management' and resource.description='listStudentsView';





