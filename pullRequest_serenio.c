// Programmer 1. This part must be used for the main branch. 
#include <stdio.h>

int main() {
    int num1=1, num2=2;
    int result = num1 + num2;
    
    printf("The sum of %d and %d is %d\n", num1, num2, result);
    
    return 0;
}

// Programmer 2. This part must be used for the pull request.
int sum(int num1, int num2) {
    return num1 + num2;
}
