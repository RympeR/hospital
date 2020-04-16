package sample;

import java.util.ArrayList;
import java.util.Scanner;

public class main {
    //list methods of hash table T1 -> key T2 ->value
    interface HashTable<T1,T2> {
        //add element
        public  boolean  push(T1 x, T2 y);
        //delete pair
        public  boolean delete(T1 x);
        //get value based on key
        public  T2  get (T1 x);
    }
    //need for hash-function
    public static class HashMaker<T> {
        public int returnHash(T x)
        {
            return x.hashCode();
        }
    }
    //key-value pair
    public static class Pair<T1,T2> {
        private final T1 key;
        private final T2 value;
        private  boolean deleted;//del status
        public Pair(T1 key, T2 value) {
            this.key = key;
            this.value = value;
            this.deleted = false;
        }
        // key
        public T1 getKey() {
            return key;
        }
        // value
        public T2 getValue() {
            return value;
        }
        //check del status
        public boolean isDeleted() {
            return deleted;
        }
        //delete key-value pair
        public boolean deletePair(){
            if (!this.deleted){
                this.deleted = true;
                return true;
            }else{
                return false;
            }
        }
    }

    public static class ChainHashTable<T1, T2> extends HashMaker<T1> implements HashTable<T1, T2> {
        private ArrayList<Pair<T1, T2>>[] table;
        //for hash keep
        public ChainHashTable() {
            table = new ArrayList[100000000];
        }
        //add element to hash table
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

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println("Input amount of actions: ");
        int n = in.nextInt();
        HashTable<String, String> table = new ChainHashTable<String, String>();
        for(int i = 0; i < n;i++)
        {
            System.out.println("Input action type [push/delete/get] : ");
            String s = in.next();
            if(s.equals("push"))
            {
                System.out.println("Input key to push: ");
                String key = in.next();
                System.out.println("Input value to push: ");
                String value = in.next();
                table.push(key, value);
            }
            if(s.equals("delete"))
            {
                System.out.println("Input key which pair delete: ");
                String temp = in.next();
                table.delete(temp);
            }
            if(s.equals("get"))
            {
                System.out.println("Input key which pair delete: ");
                String temp = in.next();
                System.out.println(table.get(temp));
            }
        }
    }
}



