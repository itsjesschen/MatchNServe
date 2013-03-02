Notes on database. Check back here for information regarding the database.
If something is missing, let me know and I'll add them in.

When you see a new db sql added, drop all your tables, and add everything back using the 
new sql. This makes sure that everyone is on the same footing when it comes to db data.
- Jason



---------------- LAST UPDATE 3/1/2013 ----------------

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

Organizations 

Attributes
OrganizationID refers to the id of the org
Name refers to the name of the org
CauseID references the CauseID from causes table
Address refers to the street address of the org
Zipcode refers to the zipcode of the org
Phone refers to the phone number of the org
Website refers to the URL of the org's website
Mission refers to the mission statement of the org

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

PGFJoin

Attributes
ProjectID refers to a specific project
PGF_ID refers to a specific projectGoodFor value.

Use
Ties a project to a specific group of people that its good for.

###########################################################

ProjectGoodFor

Attributes
PGF_ID refers to a specific projectgoodfor value
Description refers to what the project is good for

Use
The reference table for PGFJoin table.

###########################################################

Projects

Attributes
ProjectID refers to a specific project
Name refers to the name of the project
Details contains more information about the porject (aka description)
Location refers to the zipcode of the project (eg 90007)
StartTime refers to the date and time the project starts (if its full day, leave time at midnight)
EndTime refers to the date and time the project ends (if its full day, leave time at midnight)
Spots refers to the number of users that can sign up 
Admin refers to the user who created the project (it references the UserID from users table)
Status refers to whether or not the project is still open or closed or if its a draft.
Requirements refers to any specific requirements that the org needs (its a string!)
Headline refers to a short sentence or two that the org wants to put. (string)
Image refers to the directory location where the image is located.

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

Skills

Attributes
SkillID refers to a specific skill
Description refers to what a skill actually is

Uses
Lists all the available predetermined skills that the site supports.

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
FirstName refers to the user's first name
LastName refers to the user's last name
Name refers to the username of the user
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






























