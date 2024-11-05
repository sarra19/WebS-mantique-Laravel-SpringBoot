package tn.esprit.ecodev.Services;

import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import tn.esprit.ecodev.Entities.RecycledContent;
import tn.esprit.ecodev.Repositories.RecycledContentRepository;

import java.util.List;
@Service
@AllArgsConstructor
@Slf4j
public class RecycledContentServiceImpl implements RecycledContentService {

    private RecycledContentRepository recycledContentRepository;

    @Override
    public List<RecycledContent> getAllRecycledContents() {
        return recycledContentRepository.findAll();
    }

    @Override
    public RecycledContent getRecycledContentById(Long id) {
        return recycledContentRepository.findById(id).orElse(null);
    }

    @Override
    public RecycledContent createRecycledContent(RecycledContent recycledContent) {
        return recycledContentRepository.save(recycledContent);
    }

    @Override
    public RecycledContent updateRecycledContent(Long id, RecycledContent recycledContent) {
        if (!recycledContentRepository.existsById(id)) {
            return null; // Or throw an exception
        }
        recycledContent.setId(id); // Set the ID of the recycled content to be updated
        return recycledContentRepository.save(recycledContent);
    }

    @Override
    public void deleteRecycledContent(Long id) {
        recycledContentRepository.deleteById(id);
    }
}
