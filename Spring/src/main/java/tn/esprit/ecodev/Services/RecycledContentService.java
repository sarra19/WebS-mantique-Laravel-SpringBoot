package tn.esprit.ecodev.Services;


import tn.esprit.ecodev.Entities.RecycledContent;

import java.util.List;

public interface RecycledContentService {
    List<RecycledContent> getAllRecycledContents();
    RecycledContent getRecycledContentById(Long id);
    RecycledContent createRecycledContent(RecycledContent recycledContent);
    RecycledContent updateRecycledContent(Long id, RecycledContent recycledContent);
    void deleteRecycledContent(Long id);
}
