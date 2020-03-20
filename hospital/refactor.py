import pandas as pd

csv = pd.read_csv('Pharmacies.csv',low_memory=False)
df = pd.DataFrame(csv)

columns = [i for i in df.columns][:36]
df[columns].to_csv('New.csv')   