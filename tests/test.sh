#!/bin/bash -e

echo "------------------------"
echo -e "Running tests in $PWD...\n"

EXPECTED_PATH=expected/all_output.expected
ACTUAL_PATH=all_output.actual

# Check for expected output file
if [ ! -e ${EXPECTED_PATH}  ]; then
	echo "Error: expected output file not found!" 1>&2
	exit 1
fi

# Remove output file (if any)
rm -f ${ACTUAL_PATH}

# Run phan, forward output to file
$1/vendor/bin/phan | tee ${ACTUAL_PATH}

# diff returns a non-zero exit code if files differ or are missing
# This outputs the difference between actual and expected output.
echo
echo "Comparing the output:"
diff ${EXPECTED_PATH} ${ACTUAL_PATH}
EXIT_CODE=$?
if [ "$EXIT_CODE" == 0 ]; then
	echo "Files $EXPECTED_PATH and output $ACTUAL_PATH are identical"
fi
echo "------------------------"
echo -e "\n"
exit ${EXIT_CODE}
