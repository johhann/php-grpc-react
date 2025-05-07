#!/bin/bash

PROTO_DIR=./proto
OUT_DIR=./backend/app/GRPC/Proto
PLUGIN_PATH=./protoc-gen-php-grpc  # same directory as this script

# Ensure base output directory exists
mkdir -p "$OUT_DIR"

# Generate PHP classes and gRPC service stubs
for file in "$PROTO_DIR"/*.proto; do
    BASENAME=$(basename "$file" .proto)
    CAPITALIZED=$(echo "$BASENAME" | awk '{print toupper(substr($0,1,1)) tolower(substr($0,2))}')
    DEST="$OUT_DIR/$CAPITALIZED"

    echo "🔄 Generating PHP classes from: $file into $DEST"
    mkdir -p "$DEST"

    # Generate PHP and Spiral-compatible gRPC interfaces
    protoc \
        --proto_path="$PROTO_DIR" \
        --php_out="$DEST" \
        --php-grpc_out="$DEST" \
        --plugin=protoc-gen-php-grpc="$PLUGIN_PATH" \
        "$file"

    if [ $? -ne 0 ]; then
        echo "❌ Failed to generate files for $file"
        exit 1
    fi
done

echo "✅ Generation completed. Output root: $OUT_DIR"
