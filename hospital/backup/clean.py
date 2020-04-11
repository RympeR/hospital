import pandas as pd
import mysql.connector
from sqlalchemy import create_engine
mydb = mysql.connector.connect(
    host="127.0.0.1",
    user="hospital",
    passwd="1111",
    database="hospital"
)
cursor = mydb.cursor()
cs = pd.read_csv("Pharmacies.csv",low_memory=False)
df = pd.DataFrame(cs)
columns = [i for i in df.columns]
cursor.execute("DROP TABLE IF EXISTS pharmacy;")
cursor.execute(f"""CREATE TABLE pharmacy( 
    {columns[0]} INT PRIMARY KEY,
    {columns[1]} INT,
    {columns[2]} VARCHAR(100),
    {columns[3]} VARCHAR(100),
    {columns[4]} VARCHAR(100),
    {columns[5]} VARCHAR(100),
    {columns[6]} VARCHAR(100),
    {columns[7]} VARCHAR(100),
    {columns[8]} VARCHAR(100),
    {columns[9]} VARCHAR(100),
    {columns[10]} VARCHAR(100),
    {columns[11]} VARCHAR(100),
    {columns[12]} VARCHAR(100),
    {columns[13]} VARCHAR(100),
    {columns[14]} VARCHAR(100),
    {columns[15]} VARCHAR(100),
    {columns[16]} VARCHAR(100),
    {columns[17]} VARCHAR(100),
    {columns[18]} VARCHAR(100),
    {columns[19]} VARCHAR(100),
    {columns[20]} VARCHAR(100),
    {columns[21]} VARCHAR(100),
    {columns[22]} VARCHAR(100),
    {columns[23]} VARCHAR(100),
    {columns[24]} VARCHAR(100),
    {columns[25]} VARCHAR(100),
    {columns[26]} VARCHAR(100),
    {columns[27]} VARCHAR(100),
    {columns[28]} VARCHAR(100),
    {columns[29]} VARCHAR(100),
    {columns[30]} VARCHAR(100),
    {columns[31]} VARCHAR(100),
    {columns[32]} VARCHAR(100),
    {columns[33]} VARCHAR(100),
    {columns[34]} VARCHAR(100),
    {columns[35]} VARCHAR(100)
);""")
DB_URL = 'mysql://hospital:1111@127.0.0.1/hospital'
engine = create_engine(DB_URL)

conn = engine.connect()
print(conn)
df_ind = df.sort_values("FID")
df_ind = df_ind[columns[:36]]
df_ind = df_ind.drop_duplicates(subset="NAME")
df.to_sql(con=cursor, name='pharmacy', if_exists='replace', flavor='mysql')
print(df_ind.columns)
# for i in range(1,100000):
#     sl = df_ind["FID"] == i
#     # df_spl = df_ind[sl] 
    
#     df_l_spl = [df_ind[sl].iloc[0][columns[j]] for j in range(len(columns))]
#     df.to_sql(con=con, name='table_name_for_df', if_exists='replace', flavor='mysql')
#     try:
#         if cursor.execute(f"""INSERT INTO pharmacy VALUES (
#                         {df_l_spl[0]},{df_l_spl[1]},"{df_l_spl[2]}",
#                         "{df_l_spl[3]}","{df_l_spl[4]}","{df_l_spl[5]}",
#                         "{df_l_spl[6]}","{df_l_spl[7]}","{df_l_spl[8]}",
#                         "{df_l_spl[9]}","{df_l_spl[10]}","{df_l_spl[11]}",
#                         "{df_l_spl[12]}","{df_l_spl[13]}","{df_l_spl[14]}",
#                         "{df_l_spl[15]}","{df_l_spl[16]}","{df_l_spl[17]}",
#                         "{df_l_spl[18]}","{df_l_spl[19]}","{df_l_spl[20]}",
#                         "{df_l_spl[21]}","{df_l_spl[22]}","{df_l_spl[23]}",
#                         "{df_l_spl[24]}","{df_l_spl[25]}","{df_l_spl[26]}",
#                         "{df_l_spl[27]}","{df_l_spl[28]}","{df_l_spl[29]}",
#                         "{df_l_spl[30]}","{df_l_spl[31]}","{df_l_spl[32]}",
#                         "{df_l_spl[33]}","{df_l_spl[34]}","{df_l_spl[35]}"    
#         );"""):
#             print("added")
#     except Exception as e:
#         print(e)
#         break
# mydb.commit()
# sl = df_ind["FID"] == i
# df_spl = df_ind[sl] 
# df_l_spl = [df_ind[sl].iloc[0][columns[i]] for i in range(len(columns))]
    
# for i in range(1,5):
#     sl = df_ind["FID"] == i

#     df_l_spl = [df_ind[sl].iloc[0][columns[j]] for j in range(len(columns))]

#     print(df_l_spl[0])