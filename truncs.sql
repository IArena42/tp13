 select dept_emp.emp_no , employees.first_name, employees.last_name 
 from dept_emp 
 join employees on dept_emp.emp_no = employees.emp_no limit 3 ;
