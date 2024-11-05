package tn.esprit.ecodev.Controllers;


import lombok.AllArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import tn.esprit.ecodev.Entities.RecycledContent;
import tn.esprit.ecodev.Services.RecycledContentService;

import java.util.List;

@RestController
@RequestMapping("/api/recycled-contents")
@AllArgsConstructor
public class RecycledContentController {

    private RecycledContentService recycledContentService;

    @GetMapping
    public List<RecycledContent> getAllRecycledContents() {
        return recycledContentService.getAllRecycledContents();
    }

    @GetMapping("/{id}")
    public ResponseEntity<RecycledContent> getRecycledContentById(@PathVariable Long id) {
        RecycledContent recycledContent = recycledContentService.getRecycledContentById(id);
        return recycledContent != null ? ResponseEntity.ok(recycledContent) : ResponseEntity.notFound().build();
    }

    @PostMapping
    public ResponseEntity<RecycledContent> createRecycledContent(@RequestBody RecycledContent recycledContent) {
        RecycledContent createdRecycledContent = recycledContentService.createRecycledContent(recycledContent);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdRecycledContent);
    }

    @PutMapping("/{id}")
    public ResponseEntity<RecycledContent> updateRecycledContent(@PathVariable Long id, @RequestBody RecycledContent recycledContent) {
        RecycledContent updatedRecycledContent = recycledContentService.updateRecycledContent(id, recycledContent);
        return updatedRecycledContent != null ? ResponseEntity.ok(updatedRecycledContent) : ResponseEntity.notFound().build();
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteRecycledContent(@PathVariable Long id) {
        recycledContentService.deleteRecycledContent(id);
        return ResponseEntity.noContent().build();
    }
}
