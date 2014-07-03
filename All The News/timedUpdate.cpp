#include <iostream>
#include <unistd.h>
#include <stdlib.h>
#include <time.h>
#include <stdio.h>
#include <stdlib.h>
#include <vector>

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include "mysql_connection.h"
#include <string>



using namespace std;


int main()
{
    //Get uid from SQL
    struct timespec ts;
    ts.tv_sec = 1*60;

    while(1)
	{
	    
	    cout << "\nUpdateing.....\n"  << endl;
	    std::system("php loadRss.php");
	    cout << "Update Complete";
	    cout << endl;
	    nanosleep(&ts, NULL);
	}

    return EXIT_SUCCESS;
}












