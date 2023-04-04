SELECT *
FROM titles
WHERE title = 'staff';

SELECT *
FROM dept_emp
WHERE dept_no='d004';

SELECT *
FROM dept_emp
WHERE emp_no=10027;

SELECT emp_no,salary
FROM salaries
WHERE salary<=60000;

SELECT emp_no,salary
FROM salaries
WHERE salary<=60000 or salary>=80000;

SELECT emp_no,salary
FROM salaries
WHERE salary BETWEEN 60000 AND 80000;

SELECT emp_no, salary
FROM salaries
WHERE salary>=60000 AND salary<=80000;

SELECT emp_no, dept_no
FROM dept_manager
WHERE dept_no IN ('d006','d009');

SELECT *
FROM employees
WHERE last_name LIKE('c%');

SELECT *
FROM employees
WHERE last_name LIKE ('c____');

SELECT emp_no, title
FROM titles
WHERE title LIKE('%engineer%');

SELECT *
FROM employees;

SELECT emp_no, salary
FROM salaries
WHERE salary<=60000;

SELECT emp_no, salary
FROM salaries
WHERE salary>=60000 and salary<=70000;

SELECT *
FROM employees
WHERE emp_no=10001 or emp_no= 10005;

SELECT emp_no, title
FROM titles
WHERE title LIKE('%engineer%');

SELECT emp_no
FROM employees
ORDER BY emp_no;

SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no;

SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no
HAVING AVG(salary)>=30000
AND AVG(salary) <=50000;

SELECT emp_no, first_name, last_name, gender
FROM employees
WHERE emp_no in
					(
					SELECT emp_no
					FROM salaries
					GROUP BY emp_no
					HAVING avg(salary)>=70000
					);
					
SELECT emp_no, last_name
FROM employees
WHERE emp_no in   
					(
					SELECT emp_no
					FROM titles
					WHERE to_date >=NOW() and title='senior engineer'
					);