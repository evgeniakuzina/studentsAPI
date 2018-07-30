# API for storing parents and students 

Routes:

GET - 'api/ancestors' - to receive the list of all parents. 

GET - 'ancestors/{ancestor}' - to receive parent with Id {ancestor}.

POST - 'ancestors' - to create a new ancestor. Fields: name - only alphabetic characters, surname - only alphabetic characters, age - only digits, email - only e-mails, unique field.

POST - 'ancestors/{ancestor}/add/students/{student}' - to add to the parent with Id {ancestor} student with Id {student}.

PUT - 'ancestors/{ancestor}' - to update ancestor with id {ancestor}.

DELETE - 'ancestors/{ancestor}' - to delete ancestor with id {ancestor}.



GET - 'students'- to receive the list of all students.

GET - 'students/{student}' - to receive student with Id {student}.

POST - 'students' - to create a new student. Fields: name - only alphabetic characters, surname - only alphabetic characters, age - only digits, email - only e-mails, unique field.

PUT - 'students/{astudent}' - to update student with id {student}.

DELETE - 'students/{student}' - to delete student with id {student}.

