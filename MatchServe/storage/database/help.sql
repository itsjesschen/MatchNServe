Notes on database. Check back here for information regarding the database.
If something is missing, let me know and I'll add them in.

When you see a new db sql added, drop all your tables, and add everything back using the 
new sql. This makes sure that everyone is on the same footing when it comes to db data.
- Jason



---------------- LAST UPDATE 2/7/2013 ----------------

Admins

Attributes
OrganizationID refers to the orgID 
UserID refers to the userID

Use
Every org has one or more admins. Each time a user is made an admin, add that user to this
table. Find all the admins belonging to an org or which org a user is an admin off.

###########################################################

Causes

Attributes
CauseID refers to the specific cause
Description refers to the description of the cause

Use
Contains all the types of causes that a project can belong to

###########################################################

Organizations (incomplete as of 2/7/2013)

Attributes
OrganizationID refers to the id of the org
Name refers to the name of the org

Use
Contains all the information regarding a specific organization

###########################################################

OrgProject

Attributes
OrganizationID refers to a specific org
ProjectID refers to a specific project

Use
Ties a project to an organization. Find all the projects an org has or which org created
a specific project.

###########################################################

Projects

Attributes
ProjectID refers to a specific project
Name refers to the name of the project
Details contains more information about the porject (aka description)
Location refers to the zipcode of the project (eg 90007)
Date refers to the FIRST instance of the project start date and time
Spots refers to the number of users that can sign up 
Admin refers to the user who created the project
Cause refers to the type of project it is
Status refers to whether or not the project is still open or closed
Requirements refers to any specific requirements that the org needs (its a string!)
Headline refers to a short sentence or two that the org wants to put. (string)

Use
Contains all the information pertaining to a specific project

###########################################################

ProjectSkill

Attributes
ProjectID refers to a specific project
SkillID refers to a specific skill

Use
Lists the skills that a project needs. Find all projects that match a skill or all the
skills that a project needs.

###########################################################

ProjectTime

Attributes
ProjectID refers to a specific project
TS_ID refers to a specific 30 minute timeslot

Uses
Matches a project with a specific timeslot!! One timeslot per row. 
- Eventhough this table will grow very large, it is MUCH more efficient to have the 
  calculations kept on the db than doing it on the site backend. 

###########################################################

Skills

Attributes
SkillID refers to a specific skill
Description refers to what a skill actually is

Uses
Lists all the available predetermined skills that the site supports.

###########################################################

Timeslot

Attributes
TS_ID refers to a specific 30 minute timeslot
Day refers to the day of the timeslot
Time refers to the beginning to the 30 minute timeslot

Uses
Acts as a hashtable for all 30 minute timeslots in a week.

###########################################################

UserProject

Attributes
UserID refers to a specific user
ProjectID refers to a specific project
TS_ID refers to a specific 30 minute timeslot

Use
Keeps track of which user signed up for which project and when. If a user signs for
for 2 hours for project 2, there will be 4 rows for this (four 30 minute slots). Again
it will cause the db to grow large but this is MOST efficient.

###########################################################

Users

Attributes
UserID refers to a specific user
Name refers to the name of the user
Email refers to the user's email
Password refers to the user's password
Phone refers to the user's phone number. Keep in digits only (eg 2139992244)
LastLoggedIn refers to the last date the user logged in
KarmaPoints refers to how many karma points a user has
Availability refers to when a user is actually free (TODO - may require modification)
Zipcode refers to the zipcode the user is currently in

Use
Contains all the information pertaining to a user

###########################################################

UserSkill

Attributes
UserID refers to a specific user
SkillID refers to a specific skill

Use
Lists all the skills each user has. Find all users with a specific skill.

###########################################################






























