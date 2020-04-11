import os
os.makedirs("thisfolder")
try:
    os.system("pip install sqlalchemy")
    os.system("pip install pandas")
    os.system("pip install pymysql")


except Exception as identifier:
    pass
from sqlalchemy import create_engine

import pymysql

import pandas as pd



os.makedirs("thisfolder")
cs = pd.read_csv("/Pharmacies.csv",low_memory=False)


tableName   = "pharmacy"

dataFrame   = pd.DataFrame(data=cs) 

columns = [i for i in dataFrame.columns]           

df_ind = dataFrame.sort_values("FID")

df_ind = df_ind[columns[:36]]
 

sqlEngine       = create_engine('mysql+pymysql://admin_admin:cJ9Mhri450@localhost/admin_hospital', pool_recycle=3600)

dbConnection    = sqlEngine.connect()

 

try:

    frame           = df_ind.to_sql(tableName, dbConnection, if_exists='fail')

except ValueError as vx:

    print(vx)

except Exception as ex:   

    print(ex)

else:

    print("Table %s created successfully."%tableName);   

finally:

    dbConnection.close()