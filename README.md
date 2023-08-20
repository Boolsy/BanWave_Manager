# BanWave Manager

![BanWave Manager Logo](https://image.noelshack.com/fichiers/2023/33/7/1692536206-capture-d-ecran-2023-08-20-145612.png)

BanWave Manager is a website designed to streamline the management of "user" accounts in the CS game.<br>
The core objective of this project is to create a tool that efficiently manages user accounts while providing a localized experience.<br>
This project has also provided me the opportunity to enhance my PHP programming skills, which I found to be a rewarding exercise.

## Key Features

- **Account Management:** The site offers users the ability to oversee Steam accounts, including features such as account creation, modification, and deletion.<br>
Additionally, the system handles ban statuses, account ranks, and facilitates the storage of friend codes.

- **Local Operation:** The site operates locally, meaning it can be used without the need for a constant internet connection.<br>
This also ensures heightened security for sensitive data.

## Installation

1. **Install WampServer:** Before starting, ensure you have WampServer installed on your machine.
2. <br>WampServer is a web development environment for Windows that combines Apache, MySQL, and PHP.

3. **Clone the Repository:** Open a terminal window and navigate to the www folder of your WampServer installation (usually located at `C:\wamp\www\` or a similar path).<br> Use the following command to clone the repository:

    ```bash
    git clone https://github.com/Boolsy/BanWave_Manager.git
    ```

4. **Start WampServer:** Launch WampServer from the icon in the taskbar or through the Start menu.

5. **Start the Server:** Verify that the Apache and MySQL icons are green in the WampServer taskbar, indicating that the services are running.

6. **Access the Project:** Open your web browser and enter the following URL to access the project: `http://localhost/namefolder`

7. **Explore the Project:** You can now explore and interact with the project locally through your browser.

## Method 2: Download and Drag-and-Drop

1. **Install WampServer:** If you haven't already, make sure to install WampServer.

2. **Download the Project:** Download the project from the GitHub page using the "Code" button and then "Download ZIP". Extract the contents of the ZIP file into the www folder of your WampServer installation.

3. **Start WampServer:** Launch WampServer from the icon in the taskbar or through the Start menu.

4. **Start the Server:** Verify that the Apache and MySQL icons are green in the WampServer taskbar, indicating that the services are running.

5. **Access the Project:** Open your web browser and enter the following URL to access the project: `http://localhost/folder-name/`

6. **Explore the Project:** You can now explore and interact with the project locally through your browser.

## Database Installation

**Note:** Ensure that WampServer is running before beginning these steps.

1. **Connect to phpMyAdmin:** Open your web browser and access the phpMyAdmin interface using the following URL: `http://localhost/phpmyadmin/`.

2. **Login Credentials:** Once on the phpMyAdmin page, log in using the "root" user without a password.<br> By default, WampServer is configured with these credentials.

3. **Create a Database:** In phpMyAdmin, locate the tab to create a new database.<br> Use the same name as indicated in the project documentation (Database Name: "accsteam").

4. **Import the Database:** Once the database is created, find the import option in phpMyAdmin.<br> Select the database file located in the project, then initiate the import process.<br> Ensure that the corresponding file is included in the project folder.

5. **Configuration Complete:** Once the import is complete, your database is ready to be used with the project.

These steps should allow you to properly configure the necessary database for the application to function.<br> Feel free to contact me if you encounter issues or have additional questions.

Make sure to have WampServer running whenever you want to access the project locally.<br> These installation methods facilitate the setup of a PHP development environment, ensuring optimal application functionality.

## For Dev

Hello to all developers! First and foremost, I'd like to mention that I'm still a beginner in programming, and I'm well aware that my achievement might raise a few eyebrows among seasoned developers.<br> I'm in the learning phase, and every step of this project has been a way for me to progress and put into practice what I've learned so far.

I'd like to emphasize that any feedback, suggestions, or advice are extremely valuable to me. <br>I'm open to receiving constructive feedback that could help me improve the quality and robustness of this project.<br> Don't hesitate to share your ideas, even if they seem minor, as they could have a significant impact on my learning journey.

I'd also like to mention that I haven't delved into the JavaScript language yet, and the few lines of JavaScript code in the project were generated with the help of an AI. There's likely room for improvement in this area, and I'm eager to learn more to enhance these aspects.

Lastly, I warmly invite you to contribute to the project by proposing new branches and variations. <br>If you have ideas to expand on existing features, adapt the project for other games, or explore aspects I haven't considered yet, feel free to explore new directions.

*Boolsy*
