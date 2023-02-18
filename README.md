Getting Started

Follow the instructions below to get the project up and running on your local machine.
To run this project, you will need to have Node.js and Docker, installed on your machine.

Runing project

Clone this repository to your local machine.

Open a terminal and navigate to the app directory using the following command:
cd app

Install the project dependencies using the following command:
npm install

Start the project using the following command:
npm start

Navigate to the root directory of the project.
cd ../

Run the following command to build and start the application in a Docker container:
docker compose -f 'docker-compose.yml' up -d --build

Once the container is running, open a web browser and navigate to http://localhost/ (http://localhost:80/) to view the application.
You can see db in phpMyAdmin on http://localhost:8080/ whith "root" login.
