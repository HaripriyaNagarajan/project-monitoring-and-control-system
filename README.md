        Efficient Web-based Software Project
      Monitoring, Tracking and Control System
Description
          The project managers, ensure that products or services delivered to customers , meet their                  expectations for better quality and satisfaction .Statistical Process Control  is the use of statistical tools and techniques to analyze a process or its outputs to control, manage, and improve the quality of the output or the capability of the process .
Technology details
PHP ,  Micro soft SQL
Excepted output of project
Screen details
1.	Client module
2.	Admin module
3.	Project module
4.	Employee module
5.	Project scheduling
6.	Time tracking
7.	Report


In preprocessing  
1.Client module
The client details are stored in a centralized server. Each client will be allocated a unique id to track the client easily. The details of the client project information will be updated in the server. For consuming necessary time, keeping all troubles less, and to organize all documents into one place and most important , to keep track of projects that are  in production for customers or for keeping an eye on errors or mistakes that occur  during the work process, then a good web based management system.
Admin module
 The details of the employee project information will be updated in the server for consuming necessary   time, keeping all troubles less, and to organize all documents into one place and most important , to keep  track of projects that are  in production for customers or for keeping an eye on errors or mistakes that occur   during the work process, then a good web based management system



2.Project module
The project activities are portioned and the requirements are allocated to the project based on the client requirements. The budget, duration of the project activity, technology details are updated in the module. The objective for collaboration has been: getting thing done faster, cheaper and better by applying their common knowledge, bringing together a selection of resources and attainments in a project. 
3.Employee module
The employee personal and official details are registered for project allocation based on the skillset of the employee. Each employee is allocated with specific id and it will be easier to track the employee time sheet work allotment.
 4.Project scheduling 
The project allocation is performed based on the projects and the employee availability and skillset 
and duration of the project. The time allocation is also performed in the scheduling process.  The 
complete work scheduling process is finalized with term of the client modules.
5.Time tracking
A smart time tracking web application for individuals and/or teams, to see how much time employee spends on client project, task and/or activity. See individual time in the reports, which user can filter and group by client, project, etc. 
There are many features. The main benefits from Time Tracking are:
Find out how employee spend time and monitor the time expenses
•	Increase efficiency and earn more for hourly paid work
•	See the productivity of team improvement
•	Know the profitability of tasks and projects

6.reports 
The web application will help to arrange reports management inside company, by keeping documents in one centralized server. Also, the most important it helps to keep track on new projects that are implemented and for those that are under implementation for customers and also to keep eye on errors or mistakes that occur during our work process for some projects. The system is web-based; there is a possibility to add documents/specifications for the specific project.


Table Description 
PK	Primary key
1.client _table:
Client id– int [PK]
Client name– nchar(50) 
Company name – nchar(50)
 Mob num – int[PK]
Project name- nchar(50)
Address - nchar(50)

2. Admin _table:
User name– nchar(50)
password – nchar(50) 

3.  Project_table:
Project id-int[PK]
project name – nchar(50)
Technology– nchar(50)
Duration – int [PK]
Budget – int[PK]

4.Employee _table:
Employee id – int [PK]
Employee name – nchar(50)
Address – nchar(50)
Email – nchar(50)
Technical skills – nchar(50)
Experience – nchar(50)




Testing
Following this step a variety of tests are conducted.


Test case no	Description	Actual result	Expected Result	Result
1.	Test for all cache responses.	All cache responses should be in the approximate value around 28.9 ms	All cache responses should be in the approximate value around 28.9ms	Pass
2.	Test for various responses	The result after execution should give the accurate result	The result after execution should give the accurate result	Pass

FUTURE WORK
In this work, the Time Tracking and Management is proposed based on the web-based application. We believe this is the study to demonstrate the use of textual entailment recognition on project monitoring and control. The experimental results show that the time tracking monitoring and control can effectively evaluate the percentage of progress completion to reduce the human efforts and the costs of the project. However, we find it difficult to further improve the performance of progress completion evaluation of project progress reports under the circumstance of deficient background knowledge. Moreover, our error analysis shows that modifier detection is critical in textual entailment recognition. We speculate that the structured syntactic information may play a critical role in detecting the modifier. This indicates that future success in textual entailment recognition largely depends on effectively exploring structured syntactic information and suggests the urgency in exploring more effective syntactic features for textual entailment recognition in the future. In the future, we will explore more semantic knowledge in textual entailment recognition, which has not been covered deeply by the current research. Meanwhile, we will expand this approach to include more massive projects and even apply it to other applications in Time Tracking and Management.





