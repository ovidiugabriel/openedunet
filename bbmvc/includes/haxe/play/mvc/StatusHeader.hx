
package play.mvc;

/* public */ class StatusHeader extends Result {
    public function new(status:Int) {
        #if java
        #end
    }

    <T> Result 	chunked(Results.Chunks<T> chunks)
    // Deprecated. 
    // Use chunked(Source) instead.
    
    Result 	chunked(akka.stream.javadsl.Source<akka.util.ByteString,?> chunks)
    // Send a chunked response with the given chunks.

    Result 	sendEntity(HttpEntity entity) 
    Result 	sendFile(java.io.File file)
    // Sends the given file.

    Result 	sendFile(java.io.File file, boolean inline)
    // Sends the given file.

    Result 	sendFile(java.io.File file, boolean inline, java.lang.String fileName)
    // Send the given file.

    Result 	sendFile(java.io.File file, java.lang.String fileName)
    // Send the given file.

    Result 	sendInputStream(java.io.InputStream stream)
    // Send the given input stream.

    Result 	sendInputStream(java.io.InputStream stream, long contentLength)
    // Send the given input stream.

    Result 	sendJson(com.fasterxml.jackson.databind.JsonNode json)
    // Send a json result.

    Result 	sendJson(com.fasterxml.jackson.databind.JsonNode json, com.fasterxml.jackson.core.JsonEncoding encoding)
    // Send a json result.

    Result 	sendJson(com.fasterxml.jackson.databind.JsonNode json, java.lang.String charset)
    // Send a json result.

    Result 	sendPath(java.nio.file.Path path)
    // Sends the given path if it is a valid file.

    Result 	sendPath(java.nio.file.Path path, boolean inline)
    // Sends the given path if it is a valid file.

    Result 	sendPath(java.nio.file.Path path, boolean inline, java.lang.String filename)
    // Sends the given path if it is a valid file.

    Result 	sendPath(java.nio.file.Path path, java.lang.String filename)
    // Sends the given path if it is a valid file.

    Result 	sendResource(java.lang.String resourceName)
    // Send the given resource.

    Result 	sendResource(java.lang.String resourceName, boolean inline)
    // Send the given resource.

    Result 	sendResource(java.lang.String resourceName, boolean inline, java.lang.String filename)
    // Send the given resource.

    Result 	sendResource(java.lang.String resourceName, java.lang.ClassLoader classLoader)
    // Send the given resource from the given classloader.

    Result 	sendResource(java.lang.String resourceName, java.lang.ClassLoader classLoader, boolean inline)
    // Send the given resource from the given classloader.

    Result 	sendResource(java.lang.String resourceName, java.lang.ClassLoader classLoader, boolean inline, java.lang.String filename)
    // Send the given resource from the given classloader.    
}
