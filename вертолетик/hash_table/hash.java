
interface HashTable<T1,T2> {
    public  boolean  push(T1 x, T2 y);
    public  boolean delete(T1 x);
    public  T2  get (T1 x);
}

public class Pair<T1,T2> {
    private final T1 key;
    private final T2 value;
    private  boolean deleted;
    public Pair(T1 key, T2 value) {
        this.key = key;
        this.value = value;
        this.deleted = false;
    }
    public T1 getKey() {
        return key;
    }
    public T2 getValue() {
        return value;
    }
    public boolean isDeleted() {
        return deleted;
    }
    public boolean deletePair(){
        if (!this.deleted){
            this.deleted = true;
            return true;
        }else{
            return false;
        }
    }
}
import java.util.ArrayList;
public class ChainHashTable<T1, T2> extends HashMaker<T1> implements HashTable<T1, T2> {
    private ArrayList<Pair<T1, T2>>[] table;
    public ChainHashTable() {
        table = new ArrayList[100000];
    }
public boolean push(T1 x, T2 y) {
        int h = returnHash(x);
        int n;
        try{
            n = table[h].size();
        }catch (NullPointerException e){
            table[h] = new ArrayList<Pair<T1, T2>>();
            n = 0;
        }
        for (int i = 0; i < n; i++) {
            if (table[h].get(i).getKey() == x) {
                table[h].set(i, new Pair<T1, T2>(x, y));
                return false;
            }
        }
        table[h].add(new Pair<T1, T2>(x, y));
        return true;
    }
	public boolean delete(T1 x) {
        int h = returnHash(x);
        int n;
        try {
            n = table[h].size();
        } catch (NullPointerException e) {
            return false;
        }
        for (int i = 0; i < n; i++) {
            if (table[h].get(i).getKey().equals(x)) {
                table[h].remove(i);
                return true;
            }
        }
        return false;
    }

    public T2 get(T1 x) {
        int h = returnHash(x);
        int n;
        try {
            n = table[h].size();
        } catch (NullPointerException e){
            return  null;
        }
        for (int i = 0; i < n; i++) {
            if (table[h].get(i).getKey().equals(x)) {
                return table[h].get(i).getValue();
            }
        }
        return null;
    }
}
public class HashMaker<T> {
    public int returnHash(T x)
    {
        return x.hashCode();
    }
}
public class Solution {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int n = in.nextInt();
        HashTable<String, String> table = new ChainHashTable<String, String>();
        for(int i = 0; i < n;i++)
        {
            String s = in.next();
            if(s.equals("push"))
            {
                String temp = in.next();
                table.push(temp, temp);
            }
            if(s.equals("delete"))
            {
                String temp = in.next();
                table.delete(temp);
            }
            if(s.equals("get"))
            {
                String temp = in.next();
                System.out.println(table.get(temp));
            }
        }
    }
}