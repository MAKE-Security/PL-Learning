import java.io.*;

public class Memo {
    public static void main(String[] args) throws IOException {
        BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter writer = new BufferedWriter(new FileWriter("memo.txt"));
        
        System.out.println("메모를 작성하세요.");
        String line;
        while ((line = reader.readLine()) != null) {
            if (line.equals("exit")) {
                break;
            }
            writer.write(line + "\n");
        }
        
        writer.close();
        
        BufferedReader fileReader = new BufferedReader(new FileReader("memo.txt"));
        
        System.out.println("저장된 메모:");
        while ((line = fileReader.readLine()) != null) {
            System.out.println(line);
        }
        
        fileReader.close();
    }
}
